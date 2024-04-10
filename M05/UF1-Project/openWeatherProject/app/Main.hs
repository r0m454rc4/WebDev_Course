-- To compile it: stack build.
-- To run it: stack exec openWeatherProject-exe

{-# LANGUAGE OverloadedStrings #-}

import Data.Aeson
import Data.Aeson.Types
import qualified Data.Vector as V
import Network.HTTP.Simple

data Weather = Weather
  { weatherDescription :: String
  , temperature :: Float
  } deriving Show

instance FromJSON Weather where
  parseJSON = withObject "weather" $ \v -> do
    weatherArray <- v .: "weather"
    let weatherObj = V.head weatherArray
    main <- v .: "main"
    temp <- main .: "temp"
    desc <- weatherObj .: "description"
    return $ Weather desc temp

parseWeather :: Value -> Parser Weather
parseWeather = withObject "weather" $ \w -> do
  desc <- w .: "description"
  return $ Weather desc 0

fetchWeather :: String -> String -> IO (Maybe Weather)
fetchWeather apiKey ciutat = do
  response <- httpJSON request :: IO (Response Value)
  let result = getResponseBody response

  case fromJSON result of
    Success weather -> return (Just weather)
    Error err       -> do
      putStrLn $ "Failed to parse weather data: " ++ err
      return Nothing
  where
    url = "http://api.openweathermap.org/data/2.5/weather?q="++ ciutat ++ "&appid=" ++ apiKey
    request = setRequestMethod "GET" $ setRequestHeader "Accept" ["application/json"] $ parseRequest_ url

main :: IO ()
main = do
  let apiKey = "5aadad610d8cf93d08e6c6345356750e"
  putStrLn "Nom de la ciutat: "
  ciutat <- getLine

  maybeWeather <- fetchWeather apiKey ciutat
  case maybeWeather of
    Just weather -> print weather
    Nothing      -> putStrLn "Failed to fetch weather data"
