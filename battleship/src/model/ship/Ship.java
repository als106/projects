/**
 * @author Álvaro Lario Sánchez 23813883M
 */

package model.ship;

import model.Craft;
import model.Orientation;

/**
 * Esta clase representa las distintas naves
 * que apareceran en el tablero de la clase
 * Board y que hereda de la clase Craft
 */
public abstract class Ship extends Craft {
	/**
	 * El siguiente metodo es el constructor de la clase ship
	 * el cual se encargar de mandar los parametros a la superclase Craft
	 * @param o orientacion
	 * @param s simbolo
	 * @param n nombre
	 */
	public Ship(Orientation o,char s,String n) {
		super(o,s,n);
	}
}