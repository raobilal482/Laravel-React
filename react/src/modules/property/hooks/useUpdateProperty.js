import { useMutation, useQueryClient } from "@tanstack/react-query";
import { updateProperty } from "../../../api/property.api";
import { useNavigate } from "react-router-dom";
import { message } from "antd";


export default function useUpdateProperty(id) { 
    const queryClient = useQueryClient();
    const navigate = useNavigate();

    return useMutation({
        mutationFn: (data) => updateProperty(id, data),
        onSuccess: () => { 
            queryClient.invalidateQueries(['properties']);
            queryClient.invalidateQueries(['property', id]);

            message.success("Property updated successfully!");
            navigate('/properties');
        },
        onError: (err) => {
            console.error("Update Error:", err.response?.data);
            message.error("Failed to update property.");
        }
    });
 }