import "./button.css";

export const Button = ({ text, type }) => {
	return (
		<button className="button" type={type}>
			{text}
		</button>
	);
};
