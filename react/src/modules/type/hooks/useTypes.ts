import { useQuery } from "@tanstack/react-query";
import { getTypes } from "../../../api/type.api";
import { IListingType } from "../../../types/listingTypes";


export default function useTypes() {
    return useQuery<IListingType[]>({
        queryKey: ['types'],
        queryFn: getTypes
    });
 }