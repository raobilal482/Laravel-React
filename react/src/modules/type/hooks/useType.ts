import { getSingletype } from "../../../api/type.api";
import { useQuery } from "@tanstack/react-query";
import { IListingType } from "../../../types/listingTypes";
export default function useType(typeId: number) { 
    return useQuery<IListingType>({
        queryKey: ['type',typeId],
        queryFn: () => getSingletype(typeId),
        enabled: !!typeId
    });
}