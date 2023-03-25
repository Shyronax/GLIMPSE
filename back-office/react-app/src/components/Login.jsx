import { useState, useContext } from "react";
import { AuthContext } from "../context/AuthContext";
import { Button } from "./buttons/Button";

export const Login = () => {
	const [pseudo, setPseudo] = useState("");
	const [mdp, setMdp] = useState("");
	const [status_message, setStatus_message] = useState("");
	const authContext = useContext(AuthContext);

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
				if (data.status_user == 1) {
					//faire le JWT ici
					authContext.login();
				} else {
					setStatus_message(data.status_message);
				}
			});
	};

	return (
		<form onSubmit={handleSubmit}>
			{status_message && <p>{status_message}</p>}
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
			<Button type="submit">Se connecter</Button>
		</form>
	);
};
