/**
 * @author Álvaro Lario Sánchez 23813883M
 */

package model.ship;

import model.Board;
import model.Coordinate;
import model.CoordinateFactory;


/**
 * Esta clase es la clase Board2D, subclase de la superclase Board
 * que es la encagada de crear tableros en dos dimensiones
 * usando coordenadas en dos dimensiones
 */
public class Board2D extends Board {
	/**
	 * Constructor de la clase Board2D que pasa el atributo
	 * size a la superclase Board
	 * @param size tamaño
	 */
	public Board2D(int size) {
		super(size);
	}
	@Override
	public boolean checkCoordinate(Coordinate c) {
		if(c instanceof Coordinate2D) {
			if((c.get(0)>=0)&&(c.get(0)<getSize())) {
				if((c.get(1)>=0)&&(c.get(1)<getSize())) {
					return true;
				}
				else {
					return false;
				}
			}
			else {
				return false;
			}
		}
		else {
			throw new IllegalArgumentException();
		}
	}
	@Override
	public String show(boolean unveil) {
		String cadena = "";
		if(unveil) {
			for(int i = 0;i<getSize();i++) {
				for(int j = 0;j<getSize();j++) {
					Coordinate example = CoordinateFactory.createCoordinate(j,i);
					if(seen.contains(example)) {
						if(board.get(example)!=null) {
							cadena += HIT_SYMBOL;
						}
						else {
							cadena += WATER_SYMBOL;
						}
					}
					else {
						if(board.get(example) != null) {
							cadena += board.get(example).getSymbol();
						}
						else {
							cadena += WATER_SYMBOL;
						}
					}
				}
				if(i != (getSize()-1)) {
					cadena += "\n";
				}
			}
			return cadena;
		}
		else {
			for(int i = 0;i<getSize();i++) {
				for(int j = 0;j<getSize();j++) {
					Coordinate example = CoordinateFactory.createCoordinate(j,i);
					if(seen.contains(example)) {
						if(board.get(example)!=null) {
							if(board.get(example).isShotDown()) {
								cadena += board.get(example).getSymbol();
							}
							else {
								cadena += HIT_SYMBOL;
							}
						}
						else {
							cadena += WATER_SYMBOL;
						}
					}
					else {
						cadena += NOTSEEN_SYMBOL;
					}
				}
				if(i != (getSize()-1)) {
					cadena += "\n";
				}
			}
			return cadena;
		}
	}
}
