import { Routes, Route } from 'react-router-dom';
import Home from '../modules/Home';
import PropertyList from '../modules/property/pages/PropertyList';
import PropertyCreate from '../modules/property/pages/PropertyCreate';
import PropertyEdit from '../modules/property/pages/PropertyEdit';
import { TypeRoutes } from '../modules/type/type.routes';

const AppRoutes = () => {
  return (
    <Routes>
      <Route path="/" element={<Home />} />
      <Route path="/properties" element={<PropertyList />} />
      <Route path="/properties/create" element={<PropertyCreate />} />
      <Route path="/property/edit/:id" element={<PropertyEdit />} />

      <>{TypeRoutes}</>
    </Routes>
  );
};

export default AppRoutes;