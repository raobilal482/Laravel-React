import { Layout, Button } from "antd";
import { PlusCircleOutlined } from '@ant-design/icons';

const { Header } = Layout;

const AppHeader = () => {
  return (
    <div className="bg-white px-4 md:px-6 h-16 flex items-center justify-between shadow-sm border-b w-full sticky top-0 z-50">
      <h1 className="text-lg md:text-xl font-bold text-Grey-600 m-0">
        PropDay
      </h1>
      <Button 
        type="primary" 
        danger 
        size="middle" 
        shape="round" 
        className="flex items-center gap-2 scale-90 md:scale-100"
      >
        Logout <PlusCircleOutlined />
      </Button>
    </div>
  );
};

export default AppHeader;