package model.io;

import model.Game;

public class VisualiserConsole implements IVisualiser {
	private Game game;
	public VisualiserConsole(Game g) {
		if(g != null) {
			this.game = g;
		}
		else {
			throw new NullPointerException();
		}
	}
	@Override
	public void show() {
		System.out.println(game.toString());
	}

	@Override
	public void close() {}

}
