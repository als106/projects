/**
 * @author Álvaro Lario Sánchez 23813883M
 */

package model.aircraft;

import model.Orientation;
/**
 * 
 * La siguiente clase es la encargada de crear Aircraft
 * del tipo Bomber, es una subclase de la clase Aircraft
 *
 */
public class Bomber extends Aircraft {
	/**
	 * Este metodo seria el constructor de la clase Bomber
	 * y es el encargado de mandar los atributos a la superclase Aircraft
	 * y de dar forma al atributo shape
	 * @param o orientacion
	 */
	public Bomber(Orientation o) {
		super(o, '⇶', "Bomber");
		shape = new int[][] {
			{ 0, 0, 0, 0, 0,
				0, 0, 1, 0, 0,	
				1, 1, 1, 1, 1,	
				1, 0, 1, 0, 1,
				0, 0, 1, 0, 0},
			{ 0, 1, 1, 0, 0,
					0, 0, 1, 0, 0,	
					1, 1, 1, 1, 0,	
					0, 0, 1, 0, 0,
					0, 1, 1, 0, 0},
			{ 0, 0, 1, 0, 0,
						1, 0, 1, 0, 1,	
						1, 1, 1, 1, 1,	
						0, 0, 1, 0, 0,
						0, 0, 0, 0, 0},
			{ 0, 0, 1, 1, 0,
							0, 0, 1, 0, 0,	
							0, 1, 1, 1, 1,	
							0, 0, 1, 0, 0,
							0, 0, 1, 1, 0}}; 
	}

	@Override
	public int getValue() {
		return 15;
	}

}
