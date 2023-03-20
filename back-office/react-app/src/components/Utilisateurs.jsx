import { useState, useEffect } from "react";
import { Button } from "./buttons/Button";

export const Utilisateurs = () => {
	let [data, setData] = useState([]);

	useEffect(() => {
		fetch("http://localhost/github/glimpse/back-office/back/api/utilisateurs")
			.then((response) => response.json())
			.then((data) => setData(data));
	}, []);

	const updateUser = (id) => {
		console.log(id);
	};

	return (
		<table>
			<thead>
				<tr>
					<td>Identifiant</td>
					<td>Pseudo</td>
					<td>Email</td>
					<td>Actions</td>
				</tr>
			</thead>

			<tbody>
				{data.map((d) => (
					<tr key={d.id_utilisateur}>
						<td>{d.id_utilisateur}</td>
						<td>{d.pseudo_utilisateur}</td>
						<td>{d.email_utilisateur}</td>
						<td>
							<Button
								text={"Modifier"}
								type={"button"}
								onClick={(e) => handleClick(e, email, onDelete)}
							/>
							<Button
								text={"Supprimer"}
								type={"button"}
								onClick={() => deleteUser(d.id_utilisateur)}
							/>
						</td>
					</tr>
				))}
			</tbody>
		</table>
	);
};
