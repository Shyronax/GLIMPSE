import React, { useState } from "react";
import { Button } from "./buttons/Button";

export const Login = () => {
	const [pseudo, setPseudo] = useState("");
	const [mdp, setMdp] = useState("");

	const handleSubmit = async (event) => {
		event.preventDefault();
		fetch("http://localhost/github/glimpse/back-office/back/api/auth", {
			method: "POST",
			headers: {
				"Content-Type": "application/json",
				"Allow-Control-Allow-Origin": "*", // CORS
			},
			body: JSON.stringify({
				pseudo,
				mdp,
			}),
			mode: "no-cors",
		})
			.then((response) => response.json())
			.then((data) => {
				if (data.status == 1) {
					console.log("ok");
				} else {
					console.log("pa bon");
				}
			})
			.catch((error) => {
				console.log(error);
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
