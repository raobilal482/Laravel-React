import api from '../../../api/axios';
import { useQueryClient, useMutation } from '@tanstack/react-query';
import { deleteProperty } from '../../../api/property.api';
import { message } from 'antd';

export const useDeleteProperties = () => { 

    const queryClient = useQueryClient();
    return useMutation({
        mutationFn: deleteProperty,
        onSuccess: () => {
            message.success("Property Deleted");
            queryClient.invalidateQueries(['properties']);
        },
        onError: (err) => { 
            message.error(err.message);
        }
    });

}