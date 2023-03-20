export const NavElement = ({ linkName, linkImg, isActive }) => {
  return (
    <div>
      <img
        src={isActive ? `img/active-${linkImg}.svg` : `img/${linkImg}.svg`}
        alt=""
      />
      <p>{linkName}</p>
    </div>
  );
};
