package model.io;

import java.lang.reflect.Constructor;
import java.lang.reflect.InvocationTargetException;

import model.Craft;
import model.Game;
import model.Orientation;

public class VisualiserFactory {
	public static IVisualiser createVisualiser(String n,Game g) {
		try {
			Class<?> c;
			c = Class.forName("model.io.Visualiser"+n);
			Class<?>[] paramTypes = new Class[] {Game.class};
			Constructor<?> m = c.getConstructor(paramTypes);
			Object[] arguments = new Object[] {g};
			IVisualiser v = (IVisualiser)m.newInstance(arguments);
			return v;
		} catch (ClassNotFoundException | NoSuchMethodException | SecurityException | InstantiationException | IllegalAccessException | IllegalArgumentException | InvocationTargetException e) {
			return null;
		}
	}
}
