import api from './axios';

export const getProperties = () => { 
    return api.get('/property').then(res => res.data.properties);
} 

export const createProperty = (data) => {
    return api.post('/property', data).then(res => res.data);
}

export const getSingleProperty = (propertyId) => {
    return api.get(`/property/${propertyId}`).then(res => res.data);
}

export const updateProperty = (propertyId,data) => {
    return api.put(`/property/${propertyId}`,data).then(res => res.data);
}

export const deleteProperty = (propertyId) => {
    return api.delete(`/property/${propertyId}`).then(res => res.data);
}
 