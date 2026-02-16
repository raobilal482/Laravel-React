import api from '../../../api/axios';
import { getProperties } from '../../../api/property.api';
import { useQuery } from '@tanstack/react-query';

export const useProperties = () => { 
    return useQuery({
        queryKey: ['properties'],
        queryFn: getProperties
    });
}