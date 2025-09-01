/**
 * @author Álvaro Lario Sánchez 23813883M
 */

package model.aircraft;

import java.util.HashSet;
import java.util.Set;

import model.Coordinate;
/**
 * La siguiente clase es la clase Coordinate3D, subclase de la superclase
 * Coordinate y que se encarga de crear coordenadas de tres dimensiones
 * para posteriormente crear tableros 3D
 */
public class Coordinate3D extends Coordinate {
	/**
	 * Constructor de clase Coordinate3D, recibe como parametros 
	 * las coordenadas y se las pasa a la superclase para crearlo
	 * @param x x
	 * @param y y
	 * @param z z
	 */
	public Coordinate3D(int x,int y,int z) {
		super(3);
		set(0, x);
		set(1, y);
		set(2, z);
	}
	/**
	 * Constructor de copia de la clase Coordinate3D, recibe como parametro
	 * un tipo Coordinate y lo pasa a la superclase
	 * @param c coordinate
	 */
	public Coordinate3D(Coordinate3D c) {
		super(c);
	}
	@Override
	public Set<Coordinate> adjacentCoordinates() {
		Set<Coordinate> adyacentes = new HashSet<Coordinate>();
		for(int i=-1;i<=1;i++) {
			for(int j=-1;j<=1;j++) {
				for(int k=-1;k<=1;k++) {
					if((i!=0)||(j!=0)||(k!=0)) {
						adyacentes.add(new Coordinate3D(this.get(0)+i,this.get(1)+j,this.get(2)+k));
					}
				}
			}
		}
		return adyacentes;
	}
	@Override
	public Coordinate copy() {
		Coordinate3D c = new Coordinate3D(this);
		return c;
	}
	/**
	 * Este metodo seriia el metodo toString()
	 * @return string
	 */
	public String toString() {
		String concatenation;
		concatenation = "(";
		for (int i=0;i<3;i++)
		{
			concatenation += get(i);
			if (i<2)
				concatenation += ", ";
		}
		concatenation += ")";
		return concatenation;
	}

}
