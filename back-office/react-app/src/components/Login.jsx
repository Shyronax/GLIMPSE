import { useState, useContext } from "react";
import { AuthContext } from "../context/AuthContext";
import { Button } from "./buttons/Button";

export const Login = () => {
	const [pseudo, setPseudo] = useState("");
	const [mdp, setMdp] = useState("");
	const authContext = useContext(AuthContext);

	const date = new Date();
	const mois = date.toISOString().slice(5, 7);
	console.log(mois);

	const handleSubmit = async (e) => {
		e.preventDefault();
		fetch("http://localhost/github/glimpse/back-office/back/api/auth", {
			method: "POST",
			headers: {
				"Content-Type": "application/json",
			},
			body: JSON.stringify({
				pseudo,
				mdp,
			}),
		})
			.then((response) => response.json())
			.then((data) => {
				if (data.status == 1) {
					//faire le JWT ici
					authContext.login();
					console.log("ok");
				} else {
					console.log("pa bon");
				}
			});
	};

	return (
		<form onSubmit={handleSubmit}>
			<label>
				login:
				<input
					type="text"
					value={pseudo}
					onChange={(event) => setPseudo(event.target.value)}
				/>
			</label>
			<label>
				mdp:
				<input
					type="mdp"
					value={mdp}
					onChange={(event) => setMdp(event.target.value)}
				/>
			</label>
			<Button text="Se connecter" type="submit" />
		</form>
	);
};
