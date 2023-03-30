import { createContext, useState } from "react";

export const AuthContext = createContext();

export const AuthProvider = ({ children }) => {
	const [isAuthenticated, setIsAuthenticated] = useState(false);

	const login = () => {
		// Effectuez une demande POST pour vérifier les informations d'identification de l'utilisateur
		// Si l'utilisateur est authentifié, définir isAuthenticated sur true
		setIsAuthenticated(true);
	};

	const logout = () => {
		// Définir isAuthenticated sur false lors de la déconnexion de l'utilisateur
		setIsAuthenticated(false);
	};

	return (
		<AuthContext.Provider value={{ isAuthenticated, login, logout }}>
			{children}
		</AuthContext.Provider>
	);
};
