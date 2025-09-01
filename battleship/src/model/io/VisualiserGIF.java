package model.io;

import java.io.File;
import java.awt.Color;

import model.Board;
import model.Game;
import model.exceptions.io.BattleshipIOException;
import model.io.gif.AnimatedGIF;
import model.io.gif.FrameGIF;

public class VisualiserGIF implements IVisualiser {
	private Game game;
	private AnimatedGIF agif;
	public VisualiserGIF(Game g) {
		if(g != null) {
			this.game = g;
			agif = new AnimatedGIF();
		}
		else {
			throw new NullPointerException();
		}
	}
	@Override
	public void show() {
		String tablero1 = game.getBoard1().show(false);String tablero2 = game.getBoard2().show(false);
		
		FrameGIF frame = new FrameGIF(tablero1.length()/game.getBoard1().getSize(), (game.getBoard1().getSize()*2)+1);
		
		int ancho = tablero1.length()/game.getBoard1().getSize()+1;
		
		try {
			for(int i=0;i<game.getBoard1().getSize();i++) {
				for(int j=0;j<(tablero1.length()/game.getBoard1().getSize());j++) {
					if(tablero1.charAt((i*ancho)+j) == Board.NOTSEEN_SYMBOL) {
						frame.printSquare(j,i, Color.LIGHT_GRAY);
					}
					else if(tablero1.charAt((i*ancho)+j) == Board.BOARD_SEPARATOR) {
						frame.printSquare(j,i, Color.ORANGE);
					}
					else if(tablero1.charAt((i*ancho)+j) == Board.WATER_SYMBOL) {
						frame.printSquare(j,i, Color.BLUE);
					}
					else if(tablero1.charAt((i*ancho)+j) == Board.HIT_SYMBOL) {
						frame.printSquare(j,i, Color.RED);
					}
					else {
						frame.printSquare(j,i, Color.RED);
					}
				}
			}
			for(int i=0;i<(tablero1.length()/game.getBoard1().getSize());i++) {
				frame.printSquare(i, game.getBoard1().getSize(), Color.DARK_GRAY);
			}
			for(int i=0;i<game.getBoard2().getSize();i++) {
				for(int j=0;j<(tablero2.length()/game.getBoard2().getSize());j++) {
					if(tablero2.charAt((i*ancho)+j) == Board.NOTSEEN_SYMBOL) {
						frame.printSquare(j, i+game.getBoard1().getSize()+1, Color.LIGHT_GRAY);
					}
					else if(tablero2.charAt((i*ancho)+j) == Board.BOARD_SEPARATOR) {
						frame.printSquare(j, i+game.getBoard1().getSize()+1, Color.ORANGE);
					}
					else if(tablero2.charAt((i*ancho)+j) == Board.WATER_SYMBOL) {
						frame.printSquare(j, i+game.getBoard1().getSize()+1, Color.BLUE);
					}
					else if(tablero2.charAt((i*ancho)+j) == Board.HIT_SYMBOL) {
						frame.printSquare(j, i+game.getBoard1().getSize()+1, Color.RED);
					}
					else {
						frame.printSquare(j, i+game.getBoard1().getSize()+1, Color.RED);
					}
				}
			}
		}catch (BattleshipIOException e) {
			throw new RuntimeException();
		}
		try {
			agif.addFrame(frame);
		} catch (BattleshipIOException e) {
			throw new RuntimeException();
		}
	}

	@Override
	public void close() {
		try {
			agif.saveFile(new File("files/output.gif"));
		} catch (BattleshipIOException e) {
			throw new RuntimeException();
		}
	}

}
