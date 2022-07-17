import { useEffect, useState } from "react";
import { Container, Nav, Row } from "react-bootstrap";
import { Link, useParams } from "react-router-dom";
import { GetBookById } from "../api/client/GetBookById";
import GetBookByIdParams from "../api/types/GetBookByIdParams";
import Book from "../components/Book";

export default function BookRoute() {
  const { bookId } = useParams<GetBookByIdParams>();

  const [book, setBook] = useState({});

  useEffect(() => {
    GetBookById.run(bookId).then((response) => {
      setBook(response.data)
    })
  }, []);

  return (
    <main>
      <Container>
        <Row>
          <Nav>
            <Link to="/">Home</Link>
          </Nav>
        </Row>
        <Row>
          <Book
            data={book}
          />
        </Row>
      </Container>
    </main>
  );
}
