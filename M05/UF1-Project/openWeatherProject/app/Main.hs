-- To compile it: stack build.
-- To run it: stack exec openWeatherProject-exe.

{-# LANGUAGE OverloadedStrings #-}

-- The first two imports are for working with JSON.
import Data.Aeson
import qualified Data.Vector as V
-- This import is to be able to make HTTP requests to the API.
import Network.HTTP.Simple

-- Here I create Weather, which is a datatype.
data Weather = Weather
  { weatherDescription :: String, 
    temperature :: Float
  } deriving Show  -- Deriving Show is to be able to print the values of Weather.

-- Here I specify haw I want to get the data, I use Weather typeclass.
instance FromJSON Weather where
  parseJSON = withObject "weather" $ \v -> do
    weatherArray <- v .: "weather"
    let weatherObj = V.head weatherArray
    main <- v .: "main"
    temp <- main .: "temp"
    desc <- weatherObj .: "description"

    return $ Weather desc temp

-- Here I fetch the data to the API.
fetchWeather :: String -> String -> IO (Maybe Weather)
fetchWeather clauAPI ciutat = do
  response <- httpJSON request :: IO (Response Value)  -- Here I fetch the data using httpJSON.
  let result = getResponseBody response

  case fromJSON result of
    Success weather -> return (Just weather)
    Error err      -> do
      putStrLn $ "Error al parsejar el temps: " ++ err
      return Nothing
  where
    url = "http://api.openweathermap.org/data/2.5/weather?q="++ ciutat ++ "&appid=" ++ clauAPI ++ "&units=metric"
    request = setRequestMethod "GET" $ setRequestHeader "Accept" ["application/json"] $ parseRequest_ url

-- Main function, here I ask the city I want to get the weather from.
main :: IO ()
main = do
  let clauAPI = "5aadad610d8cf93d08e6c6345356750e"
  putStrLn "Nom de la ciutat: "
  ciutat <- getLine

  maybeWeather <- fetchWeather clauAPI ciutat
  case maybeWeather of
    Just weather -> print weather
    Nothing      -> putStrLn "Error al demanar el temps."
