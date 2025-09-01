/**
 * @author Álvaro Lario Sánchez 23813883M
 */

package model.ship;

import java.util.HashSet;
import java.util.Set;

import model.Coordinate;


/**
 * La siguiente clase es la clase Coordinate2D, subclase de la superclase
 * Coordinate y que se encarga de crear coordenadas de dos dimensiones
 * para posteriormente crear tableros 2D
 */
public class Coordinate2D extends Coordinate {
	/**
	 * Constructor de clase Coordinate2D, recibe como parametros 
	 * las coordenadas y se las pasa a la superclase para crearlo
	 * @param x x
	 * @param y y
	 */
	public Coordinate2D(int x,int y) {
		super(2);
		set(0, x);
		set(1, y);
	}
	/**
	 * Constructor de copia de la clase Coordinate2D, recibe como parametro
	 * un tipo Coordinate y lo pasa a la superclase
	 * @param c coordinate
	 * 
	 */
	public Coordinate2D(Coordinate2D c) {
		super(c);
	}
	@Override
	public Set<Coordinate> adjacentCoordinates() {
		Set<Coordinate> adyacentes = new HashSet<Coordinate>();
		for(int i=-1;i<=1;i++) {
			for(int j=-1;j<=1;j++) {
				if((i!=0)||(j!=0)) {
					adyacentes.add(new Coordinate2D(this.get(0)+i,this.get(1)+j));
				}
			}
		}
		return adyacentes;
	}
	@Override
	public Coordinate copy() {
		Coordinate2D c = new Coordinate2D(this);
		return c;
	}
	/**
	 * Este metodo seria el metodo toString()
	 * @return string
	 */
	public String toString() {
		String concatenation;
		concatenation = "(";
		for (int i=0;i<2;i++)
		{
			concatenation += get(i);
			if (i<1)
				concatenation += ", ";
		}
		concatenation += ")";
		return concatenation;
	}

}
