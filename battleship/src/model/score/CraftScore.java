package model.score;

import model.Craft;
import model.io.IPlayer;

public class CraftScore extends Score<Craft> {

	public CraftScore(IPlayer player) {
		super(player);
	}

	public void score(Craft sc) {
		this.score += sc.getValue();
	}

}
