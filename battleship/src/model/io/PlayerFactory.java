package model.io;

import java.io.BufferedReader;
import java.io.FileNotFoundException;
import java.io.FileReader;

import model.exceptions.io.BattleshipIOException;

public class PlayerFactory {
	public static IPlayer createPlayer(String name,String s) throws BattleshipIOException {
		if(s.contains(".") || s.contains("/") || s.contains("\\")){
			FileReader f;
			try {
				f = new FileReader(s);
			} catch (FileNotFoundException e) {
				throw new BattleshipIOException("No puede ser creado el BufferedReader");
			}
		    BufferedReader b = new BufferedReader(f);
			PlayerFile p = new PlayerFile(name, b);
			return p;
		}
		if(isLong(s)) {
			PlayerRandom p = new PlayerRandom(name, Long.parseLong(s));
			return p;
		}
		return null;
	}
	private static boolean isLong(String s) {
		try { 
			@SuppressWarnings("unused")
			long a = Long.parseLong(s);
			return true;
		}catch(NumberFormatException e) {
			return false;
		}
	}
}
