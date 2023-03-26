import { useParams } from "react-router-dom";
import { useEffect, useState } from "react";
import { UserDetails } from "../components/UserDetails";

export const Profile = () => {
	const { id } = useParams();

	let [data, setData] = useState([]);

	useEffect(() => {
		fetch("/github/glimpse/back-office/back/api/utilisateur/" + id)
			.then((response) => response.json())
			.then((data) => setData(data));
	}, []);

	return <UserDetails dataGET={data} goBack />;
};
