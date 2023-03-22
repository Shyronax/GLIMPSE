export const Graphique = () => {
	let [data, setData] = useState([]);

	useEffect(() => {
		fetch("http://localhost/github/glimpse/back-office/back/api/tickets")
			.then((response) => response.json())
			.then((data) => setData(data));
	}, []);

	return <canvas id="graph-stats"></canvas>;
};
