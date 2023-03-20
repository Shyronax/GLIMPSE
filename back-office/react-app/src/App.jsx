import "./App.css";

import { Accounts } from "./pages/Accounts";
import { Settings } from "./pages/Settings";
import { Stats } from "./pages/Stats";
import { LoginPage } from "./pages/login";
import { Nav } from "./components/nav/Nav";
import { BrowserRouter as Router, Routes, Route } from "react-router-dom";

function App() {
	return (
		<Router>
			<Nav />
			<Routes>
				<Route exact path="/" element={<Stats />} />
				<Route path="/connexion" element={<LoginPage />} />
				<Route path="/parametres" element={<Settings />} />
				<Route path="/comptes" element={<Accounts />} />
			</Routes>
		</Router>
	);
}

export default App;
