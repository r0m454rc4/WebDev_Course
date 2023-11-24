import java.util.Scanner;

public class Principal {
    public static void main(String[] args) {
        Passatger passatger1 = new Passatger("joan", "123457", 5);
        Passatger passatger2 = new Passatger("sergi", "123455", 40);
        Passatger passatger3 = new Passatger("anna", "123459", 20);

        Scanner scanner = new Scanner(System.in);
        System.out.println("Nom del model:");
        String model = scanner.nextLine();

        System.out.println("Número de seients:");
        int seients = scanner.nextInt();
        String desti = scanner.nextLine();
        Avio avio1 = new Avio(model, seients, desti);

        System.out.println(passatger1);
        System.out.println(passatger2);
        System.out.println(passatger3);
        System.out.println(avio1);

        avio1.afegirPassatger(passatger1);
        avio1.afegirPassatger(passatger2);
        System.out.println(avio1.mostrarPassatgers());

        scanner.close();
    }
}