import { Route } from 'react-router-dom';
import TypeList from './pages/TypeList';
import TypeCreate from './pages/TypeCreate';
import TypeEdit from './pages/TypeEdit';

export const TypeRoutes = [
  <Route key="list" path="types" element={<TypeList />} />,
  <Route key="create" path="types/create" element={<TypeCreate />} />,
  <Route key="edit" path="types/edit/:id" element={<TypeEdit />} />,
];