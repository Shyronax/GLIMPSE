import { useState, useEffect } from "react";

export const Utilisateurs = () => {
	const [data, setData] = useState({});
	// Simple GET request using fetch
	const fetchApi = () => {
		fetch("http://localhost/github/glimpse/back-office/api/utilisateurs")
			.then((response) => response.json())
			.then((data) => console.log(data));
	};

	return <button onClick={fetchApi}>Click</button>;
};
