/**
 * @author Álvaro Lario Sánchez 23813883M
 */

package model.aircraft;

import model.Craft;
import model.Orientation;
/**
 * Esta clase representa las distintas aeronaves
 * que apareceran en el tablero de la clase
 * Board y que hereda de la clase Craft
 */
public abstract class Aircraft extends Craft {
	/**
	 * El siguiente metodo es el constructor de la clase Aircraft
	 * el cual se encargar de mandar los parametros a la superclase Craft
	 * @param o orientacion
	 * @param s simbolo
	 * @param n nombre
	 */
	public Aircraft(Orientation o, char s, String n) {
		super(o, s, n);
	}

}
