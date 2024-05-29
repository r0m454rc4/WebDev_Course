public class Exercici00<T> {

	private final int MAX_SIZE = 5;
	private T[] _pila;
	private int count;

	@SuppressWarnings("unchecked")
	public Exercici00() {
		_pila = (T[]) new Object[MAX_SIZE];
		count = -1;
	}

	public boolean push(T a) {
		if (count == MAX_SIZE - 1)
			return false;
		count++;
		_pila[count] = a;
		return true;
	}

	public T pop() {
		count--;
		return count == -2 ? null : _pila[count + 1];
	}

	public boolean isEmpty() {
		return (count == -1);
	}

	public int getSize() {
		return MAX_SIZE;
	}
}
