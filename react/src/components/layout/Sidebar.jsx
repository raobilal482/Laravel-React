import React, { useState } from 'react';
import { AppstoreOutlined, MailOutlined, SettingOutlined } from '@ant-design/icons';
import { Menu } from 'antd';
import { Link } from 'react-router-dom';
const items = [
  {
    key: '1',
    icon: <MailOutlined />,
    label: 'Properties',
    children: [
      { key: '11', label: <Link to="/properties">Properties</Link> },
      { key: '12', label: 'Units' },
      { key: '13', label: <Link to="/types">Types</Link> },
      { key: '14', label: 'Certificates' },
    ],
    },
    {
    key: '2',
    icon: <MailOutlined />,
    label: 'Settings',
    children: [
      { key: '15', label: <Link to="/banks">Banks</Link> },
      { key: '16', label: 'Companies' },
      { key: '17', label: <Link to="/types">Types</Link> },
      { key: '18', label: 'Roles' },
    ],
  },
  
];
const getLevelKeys = items1 => {
  const key = {};
  const func = (items2, level = 1) => {
    items2.forEach(item => {
      if (item.key) {
        key[item.key] = level;
      }
      if (item.children) {
        func(item.children, level + 1);
      }
    });
  };
  func(items1);
  return key;
};
const levelKeys = getLevelKeys(items);
const Sidebar = () => {
  const [stateOpenKeys, setStateOpenKeys] = useState(['2', '23']);
  const onOpenChange = openKeys => {
    const currentOpenKey = openKeys.find(key => !stateOpenKeys.includes(key));
    // open
    if (currentOpenKey !== undefined) {
      const repeatIndex = openKeys
        .filter(key => key !== currentOpenKey)
        .findIndex(key => levelKeys[key] === levelKeys[currentOpenKey]);
      setStateOpenKeys(
        openKeys
          // remove repeat key
          .filter((_, index) => index !== repeatIndex)
          // remove current level all child
          .filter(key => levelKeys[key] <= levelKeys[currentOpenKey]),
      );
    } else {
      // close
      setStateOpenKeys(openKeys);
    }
  };
  return (
    <Menu
      mode="inline"
      defaultSelectedKeys={['231']}
      openKeys={stateOpenKeys}
      onOpenChange={onOpenChange}
      style={{ width: 256 }}
      items={items}
    />
  );
};
export default Sidebar;