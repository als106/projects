/**
 * @author Álvaro Lario Sánchez 23813883M
 */

package model.aircraft;

import model.Board;
import model.Coordinate;
import model.CoordinateFactory;
/**
 * Esta clase es la clase Board3D, subclase de la superclase Board
 * que es la encagada de crear tableros en tres dimensiones
 * usando coordenadas en tres dimensiones
 */
public class Board3D extends Board {
	/**
	 * Constructor de la clase Board3D que pasa el atributo
	 * size a la superclase Board
	 * @param size tamaño
	 */
	public Board3D(int size) {
		super(size);
	}

	@Override
	public boolean checkCoordinate(Coordinate c) {
		if(c instanceof Coordinate3D) {
			if((c.get(0)>=0)&&(c.get(0)<getSize())) {
				if((c.get(1)>=0)&&(c.get(1)<getSize())) {
					if((c.get(2)>=0)&&(c.get(2)<getSize())) {
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
					for(int k = 0;k<getSize();k++) {
						for(int j = 0;j<getSize();j++) {
							Coordinate example = CoordinateFactory.createCoordinate(j,i,k);
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
						if(k != (getSize()-1)) {
							cadena += BOARD_SEPARATOR;
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
				for(int k = 0;k<getSize();k++) {
					for(int j = 0;j<getSize();j++) {
						Coordinate example = CoordinateFactory.createCoordinate(j,i,k);
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
					if(k != (getSize()-1)) {
						cadena += BOARD_SEPARATOR;
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
