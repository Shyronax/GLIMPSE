import "./App.css";

import { Accounts } from "./pages/Accounts";
import { Settings } from "./pages/Settings";
import { Stats } from "./pages/Stats";
import { Nav } from "./components/nav/Nav";
import { BrowserRouter as Router, Routes, Route } from "react-router-dom";

function App() {
  return (
    <Router>
      <Nav />
      <Routes>
        <Route exact path="/" element={<Stats />} />
        <Route path="/settings" element={<Settings />} />
        <Route path="/accounts" element={<Accounts />} />
      </Routes>
    </Router>
  );
}

export default App;
