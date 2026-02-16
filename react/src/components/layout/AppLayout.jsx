import React, { useState } from "react";
import AppHeader from "./Header";
import Sidebar from "./Sidebar";
import { Layout } from 'antd';

const { Content, Footer, Sider } = Layout;

export default function AppLayout({ children }) {
  const [collapsed, setCollapsed] = useState(false);

  return (
    <Layout style={{ minHeight: '100vh' }}>
      {/* Custom Header - No more black background! */}
      <AppHeader />

      <Layout>
        <Sider 
          theme="light" 
          breakpoint="lg" 
          collapsedWidth="0" 
          onBreakpoint={(broken) => console.log(broken)}
          onCollapse={(collapsed, type) => setCollapsed(collapsed)}
          width={260}
          className="border-r"
        >
          <Sidebar />
        </Sider>

        <Layout className="overflow-hidden">
          <Content className=" bg-gray-50 overflow-auto">
            <div className="bg-white p-6 min-h-full rounded-lg shadow-sm">
              {children}
            </div>
          </Content>
          <Footer className="text-center bg-white border-t p-4">
            Dashboard ©2026
          </Footer>
        </Layout>
      </Layout>
    </Layout>
  );
}