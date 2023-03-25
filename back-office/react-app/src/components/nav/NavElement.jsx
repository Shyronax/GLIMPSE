export const NavElement = ({ children, linkImg, isActive }) => {
	return (
		<div>
			<img
				src={isActive ? `img/active-${linkImg}.svg` : `img/${linkImg}.svg`}
				alt=""
			/>
			<p>{children}</p>
		</div>
	);
};
