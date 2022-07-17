import Book from "./Book";

export default function BookList(props: any) {
  const items = [];

  for (const [index, value] of props.elements.entries()) {
    items.push(<Book key={index} data={value} />)
  }

  return (
    <div>
      {items}
    </div>
  );
}
