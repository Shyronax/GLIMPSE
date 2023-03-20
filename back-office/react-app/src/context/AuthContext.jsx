import React, { createContext, useState, useEffect } from "react";

export const AuthContext = createContext();

export const AuthProvider = ({ login, mdp, children }) => {
	const [isAuthenticated, setIsAuthenticated] = useState(false);

	useEffect(() => {
		// Envoie une requête pour s'authentifier auprès de l'API
		fetch("http://localhost/glimpse/back-office/back/api/auth", {
			method: "POST",
			headers: {
				"Content-Type": "application/json",
				"Access-Control-Allow-Origin": "*",
			},
			mode: "no-cors",
			body: JSON.stringify({
				login: { login },
				mdp: { mdp },
			}),
		})
			.then((response) => response.json())
			.then((data) => {
				// Vérifie si la réponse de l'API indique que l'authentification a réussi
				if (data.status === 1) {
					setIsAuthenticated(true);
				}
			})
			.catch((error) => {
				console.error("Error authenticating:", error);
			});
	}, []);

	return (
		<AuthContext.Provider value={{ isAuthenticated }}>
			{children}
		</AuthContext.Provider>
	);
};
