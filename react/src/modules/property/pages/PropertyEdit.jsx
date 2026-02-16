import React, { useEffect } from 'react';
import { useParams } from 'react-router-dom';
import { Card, Form, Spin, message } from 'antd';
import PropertyForm from '../components/PropertyForm'; // Default import
import { useProperty } from '../hooks/useProperty'; // Named import
import  useUpdateProperty  from '../hooks/useUpdateProperty'; // Maan lete hain ye default hai

const PropertyEdit = () => {
  const { id } = useParams(); // URL se ID pakarta hai (e.g. /edit/5011)
  const [form] = Form.useForm();
  
  // 1. Data load karo
  const { data, isLoading, isError } = useProperty(id);
  
  // 2. Update karne wala hook
  const { mutate, isPending } = useUpdateProperty(id);

  // 3. Jab data backend se aa jaye, form mein set kar do
    useEffect(() => {
      console.log(data)
    if (data) {
      form.setFieldsValue(data.property);
    }
  }, [data, form]);

  const handleFinish = (values) => {
    mutate(values);
  };

  if (isLoading) return <Spin size="large" style={{ display: 'block', margin: '50px auto' }} />;
  if (isError) return message.error("Data load karne mein masla hua!");

  return (
    <Card title="Edit Property Details" className="max-w-4xl mx-auto mt-5">
      <PropertyForm 
        form={form} 
        onFinish={handleFinish} 
        isLoading={isPending}
        initialValues={data} 
      />
    </Card>
  );
};

export default PropertyEdit;