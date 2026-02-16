import api from './axios';
import { IListingType } from '../types/listingTypes';

export const getTypes = (): Promise<IListingType[]> => { 
    return api.get('/types').then(res => res.data.Types);
} 

export const createtype = (data: IListingType): Promise<IListingType> => {
    return api.post('/type', data).then(res => res.data);
}

export const getSingletype = (typeId: number): Promise<IListingType> => {
    return api.get(`/types/${typeId}`).then(res => res.data.type);
}

export const updatetype = (typeId: number,data: IListingType): Promise<IListingType> => {
    return api.put(`/type/${typeId}`,data).then(res => res.data);
}

export const deletetype = (typeId: number): Promise<void> => {
    return api.delete(`/types/${typeId}`).then(res => res.data);
}
 