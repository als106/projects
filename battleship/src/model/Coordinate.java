/**
 * @author Álvaro Lario Sánchez 23813883M
 */

package model;

import java.util.Arrays;
import java.util.Set;
/**
 * Esta clase representa una coordenada en el tablero del juego Battleship.
 * En su implementación representaremos tales coordenadas mediante dos números 
 * dentro de un vector de componentes (columna y fila).
 */
public abstract class Coordinate {
	/**
	 * El siguiente atributo seria un array de enteros que almacena las coordenadas.
	 */
	private int[] components;
	/**
	 * El siguiente metodo es el contructor de la clase que se encarga de recibir unas
	 * coordenadas y almacenarlas en el vector componentes.
	 * @param dim dimension
	 */
	protected Coordinate(int dim) 
	{
	   components = new int[dim];
	}
	/**
	 * El siguiente metodo seria el constructor de copia de la clase que se encarga de
	 * recibir un objeto de la clase Coordinate y crear un objeto copiando las variables
	 * del que se pasa como parametro.
	 * @param c objeto pasado como parametro para la copia
	 */
	protected Coordinate(Coordinate c) {
		components = new int[c.components.length];

		for (int i=0;i<components.length;i++)
			components[i]=c.components[i];
	}
	/**
	 * El siguiente metodo devuelve las coordenadas 
	 * adjacentes de una coordenada.
	 * @return hashset
	 */
	public abstract Set<Coordinate> adjacentCoordinates();
	/**
	 * Este metodo invoca al constructor de copia para
	 * realizar la copia de un objeto
	 * @return coordinate
	 */
	public abstract Coordinate copy();
	/**
	 * El siguiente metodo retorna la componente del objeto introducida mediante parametro si el valor introducido mediante
	 * parametro es valido, si no retorna -1.
	 * @param component Componente de la que retornar el valor
	 * @return Valor de la componente retornado
	 */
	public int get(int component)
	{
		if (component>=0 && component<components.length) {
			return components[component];
		}
		else
			System.err.println("Error in Coordinate.get, component " + component + " is out of range");
			throw new IllegalArgumentException();
	}
	/**
	 * El siguiente metodo asigna los valores recibidos mediante parametros al objeto de 
	 * la clase.
	 * @param component Componente que deseas modificar
	 * @param value	Valor que asignar a la componente
	 */
	public void set(int component,int value)
	{
		if (component>=0 && component<components.length) {
			components[component] = value;
		}
		else {
			System.err.println("Error in Coordinate.set, component " + component + " is out of range");
			throw new IllegalArgumentException();
		}
	}
	/**
	 * El siguiente metodo resta las coordenadas de dos objetos diferente, lo que en c++ se conoce como la sobrecarga del operador -,
	 * y devuelve el objeto con las coordenadas restadas.
	 * @param c	Objeto de la clase coordinate pasado como parametro
	 * @return	Nuevo objeto con los valores de la resta
	 */
	public final Coordinate subtract(Coordinate c){
		if(c != null) {
			   Coordinate new_c = this.copy(); 
			   if(components.length == c.components.length) {     
				   for (int i=0; i<components.length; i++)
					   new_c.set(i, new_c.get(i) - c.get(i));
			   }
			   else {
				   for (int i=0; i<2; i++)
					   new_c.set(i, new_c.get(i) - c.get(i));
			   }
	
			   return new_c;
		}
		else {
			throw new NullPointerException();
		}
	}
	/**
	 * El siguiente metodo suma las coordenadas de dos objetos diferente, lo que en c++ se conoce como la sobrecarga del operador +,
	 * y devuelve el objeto con las coordenadas sumadas.
	 * @param c Objeto de la clase coordinate pasado como parametro
	 * @return	Nuevo objeto con los valores de la suma
	 */
	public final Coordinate add(Coordinate c){
		if(c != null) {
			   Coordinate new_c = this.copy();
			   if(components.length == c.components.length) {
				   for (int i=0; i<components.length; i++)
					   new_c.set(i, new_c.get(i) + c.get(i));
			   }
			   else {
				   for (int i=0; i<2; i++)
					   new_c.set(i, new_c.get(i) + c.get(i));
			   }
	
			   return new_c;
		}
		else {
			throw new NullPointerException();
		}
	}
	/**
	 * Es un método que permite recuperar el Hash Code asignado, por defecto, por la clase Coordinate.
	 * @return Hash code original
	 */
	public int hashCode() {
		final int prime = 31;
		int result = 1;
		result = prime * result + Arrays.hashCode(components);
		return result;
	}
	/**
	 * El siguiente metodo es lo que se conoce en c++ como la sobrecarga del operador ==, que se encarga de definir si dos objetos
	 * de la clase Coordinate son iguales.
	 * @param obj Objeto a comparar pasado como parametro
	 * @return Si el objeto es el igual se devuelve true, sino devuelve falso
	 */
	public boolean equals(Object obj) {
		if (this == obj)
			return true;
		if (obj == null)
			return false;
		if (getClass() != obj.getClass())
			return false;
		Coordinate other = (Coordinate) obj;
		if (!Arrays.equals(components, other.components))
			return false;
		return true;
	}
}