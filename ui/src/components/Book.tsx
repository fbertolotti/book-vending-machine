import { Link } from "react-router-dom";

export default function Book(props: any) {
  const id = props.data.id;
  const title = props.data.title;
  const isbnCode = props.data.isbnCode;

  let authors = props.data.authors || [];

  authors = authors.map(item => item.name).join(', ');

  return (
    <div>
      <Link
        to={'/book/' + id}
      >
        <h4>{ title }</h4>
      </Link>
      <div>Author: { authors }</div>
      <div>ISBN code: { isbnCode }</div>
    </div>
  );
}
