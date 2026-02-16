import React from 'react';
import { Card, Form } from 'antd';
import PropertyForm from '../components/PropertyForm';
import useCreateProperties  from '../hooks/useCreateProperties';

const PropertyCreate = () => {
  const [form] = Form.useForm();
  const { mutate, isPending } = useCreateProperties();

  return (
    <Card title="Add New Property" className="max-w-4xl mx-auto mt-5">
      <PropertyForm 
        form={form} 
        onFinish={(values)=> mutate(values)} 
        isLoading={isPending} 
      />
    </Card>
  );
};

export default PropertyCreate;