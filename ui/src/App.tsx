import { StrictMode, useEffect, useState } from 'react';
import './App.css';
import SearchBookForm from './SearchBookForm';
import 'bootstrap/dist/css/bootstrap.min.css';
import Container from 'react-bootstrap/Container';
import Row from 'react-bootstrap/Row';
import BookList from './components/BookList';
import { GetBook } from './api/client/GetBook';
import { Nav } from 'react-bootstrap';
import { Link } from 'react-router-dom';

function App() {
  const [books, setBooks] = useState([]);

  useEffect(() => {
    GetBook.run().then((response) => {
      setBooks(response.data)
    })
  }, []);

  return (
    <StrictMode>
      <Container>
        <Row>
          <Nav>
            <Link to="/">Home</Link>
          </Nav>
        </Row>
        <Row>
          <SearchBookForm
            setBooks={setBooks}
          />
        </Row>
        <Row>
          <BookList
            elements={books}
          />
        </Row>
      </Container>
    </StrictMode>
  );
}

export default App;
