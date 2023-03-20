import React, { useState } from "react";

export const Login = () => {
	const [pseudo, setPseudo] = useState("");
	const [mdp, setMdp] = useState("");

	const handleSubmit = async (event) => {
		event.preventDefault();
		try {
			const response = await fetch(
				"http://localhost/github/glimpse/back-office/jwt-test/api/login",
				{
					method: "POST",
					headers: {
						"Content-Type": "application/json",
					},
					body: JSON.stringify({
						pseudo,
						mdp,
					}),
				}
			);
			const data = await response.json();
			console.log(data);
		} catch (error) {
			console.error(error);
		}
	};

	return (
		<form onSubmit={handleSubmit}>
			<label>
				pseudo:
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
			<button type="submit">Submit</button>
		</form>
	);
};
