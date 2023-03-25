import { useNavigate } from "react-router-dom";
import { Button } from "./buttons/Button";

export const UsersList = ({ dataGET, handleDelete }) => {
	const navigate = useNavigate();
	return (
		<table>
			<thead>
				<tr>
					<td>ID</td>
					<td>Pseudo</td>
					<td>Email</td>
					<td>Actions</td>
				</tr>
			</thead>

			<tbody>
				{dataGET.map((d) => (
					<tr key={d.id_utilisateur}>
						<td>{d.id_utilisateur}</td>
						<td>{d.pseudo_utilisateur}</td>
						<td>{d.email_utilisateur}</td>
						<td>
							<Button
								type={"button"}
								onClick={() => navigate(`/compte/${d.id_utilisateur}`)}
							>
								Modifier
							</Button>
							{d.id_utilisateur != 1 && (
								<Button
									type={"button"}
									onClick={() =>
										handleDelete(d.id_utilisateur, d.pseudo_utilisateur)
									}
								>
									Supprimer
								</Button>
							)}
						</td>
					</tr>
				))}
			</tbody>
		</table>
	);
};
