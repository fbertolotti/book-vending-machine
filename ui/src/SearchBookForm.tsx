import { useState } from 'react';
import Button from 'react-bootstrap/Button';
import Form from 'react-bootstrap/Form';
import { GetBook } from './api/client/GetBook';

export default function SearchBookForm(props: any) {
  const [ title, setTitle ] = useState();
  const [ author, setAuthor ] = useState();
  const [ isbnCode, setIsbnCode ] = useState();

  function handleSubmit(e: any) {
    e.preventDefault();

    GetBook.run(title, author, isbnCode).then((response) => {
      props.setBooks(response.data)
    })
  }

  function handleReset(e: any) {
    e.preventDefault();

    GetBook.run().then((response) => {
      props.setBooks(response.data)
    })
  }

  return (
    <Form onSubmit={handleSubmit}>
      <Form.Group className="mb-3" controlId="formTitle">
        <Form.Label>Title</Form.Label>
        <Form.Control
          placeholder="Title"
          onChange={event => setTitle(event.target.value)}
        />
      </Form.Group>

      <Form.Group className="mb-3" controlId="formAuthor">
        <Form.Label>Author</Form.Label>
        <Form.Control
          placeholder="Author"
          onChange={event => setAuthor(event.target.value)}
        />
      </Form.Group>

      <Form.Group className="mb-3" controlId="formIsbnCode">
        <Form.Label>ISBN code</Form.Label>
        <Form.Control
          placeholder="ISBN code"
          onChange={event => setIsbnCode(event.target.value)}
        />
      </Form.Group>

      <Button variant="primary" type="submit">
        Search
      </Button>

      <Button variant="primary" type="button" onClick={handleReset}>
        Reset search
      </Button>
    </Form>
  );
}
