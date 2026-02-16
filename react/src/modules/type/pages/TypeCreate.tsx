import React from 'react';
import { Card, Form } from 'antd';
import TypeForm from '../components/TypeForm';
import { FileProtectOutlined } from '@ant-design/icons';

const PropertyCreate = () => {
    const [form] = Form.useForm()
  return (
    <Card title="Add New Type" className="max-w-4xl mx-auto mt-5">
      <TypeForm 
              form={ form}
      />
    </Card>
  );
};

export default PropertyCreate;