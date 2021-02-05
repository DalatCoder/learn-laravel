CREATE TABLE [customers] (
  [id] int PRIMARY KEY IDENTITY(1, 1),
  [name] nvarchar(255),
  [address] text,
  [created_at] timestamp,
  [updated_at] timestamp
)
GO

CREATE TABLE [orders] (
  [id] int PRIMARY KEY IDENTITY(1, 1),
  [user_id] int,
  [customer_id] int,
  [status] nvarchar(255),
  [created_at] timestamp
)
GO

CREATE TABLE [order_items] (
  [id] int PRIMARY KEY IDENTITY(1, 1),
  [order_id] int,
  [product_id] int,
  [quantity] int
)
GO

CREATE TABLE [products] (
  [id] int PRIMARY KEY IDENTITY(1, 1),
  [name] nvarchar(255),
  [price] int,
  [feature_image] nvarchar(255),
  [content] text,
  [user_id] int,
  [category_id] int,
  [created_at] timestamp,
  [updated_at] timestamp
)
GO

CREATE TABLE [categories] (
  [id] int PRIMARY KEY IDENTITY(1, 1),
  [name] nvarchar(255),
  [parent_id] int,
  [created_at] timestamp,
  [updated_at] timestamp
)
GO

CREATE TABLE [product_image] (
  [id] int PRIMARY KEY IDENTITY(1, 1),
  [image] nvarchar(255),
  [product_id] int,
  [created_at] timestamp,
  [updated_at] timestamp
)
GO

CREATE TABLE [tags] (
  [id] int PRIMARY KEY IDENTITY(1, 1),
  [name] nvarchar(255),
  [created_at] timestamp,
  [updated_at] timestamp
)
GO

CREATE TABLE [product_tag] (
  [id] int PRIMARY KEY IDENTITY(1, 1),
  [product_id] int,
  [tag_id] int,
  [created_at] timestamp,
  [updated_at] timestamp
)
GO

CREATE TABLE [users] (
  [id] int PRIMARY KEY IDENTITY(1, 1),
  [name] nvarchar(255),
  [email] nvarchar(255),
  [password] nvarchar(255),
  [created_at] timestamp,
  [updated_at] timestamp
)
GO

CREATE TABLE [menus] (
  [id] int PRIMARY KEY IDENTITY(1, 1),
  [name] nvarchar(255),
  [parent_id] int,
  [created_at] timestamp,
  [updated_at] timestamp
)
GO

CREATE TABLE [sliders] (
  [id] int PRIMARY KEY IDENTITY(1, 1),
  [name] nvarchar(255),
  [description] nvarchar(255),
  [image] nvarchar(255),
  [created_at] timestamp,
  [updated_at] timestamp
)
GO

CREATE TABLE [settings] (
  [id] int PRIMARY KEY IDENTITY(1, 1),
  [config_key] nvarchar(255),
  [config_value] nvarchar(255),
  [created_at] timestamp,
  [updated_at] timestamp
)
GO

ALTER TABLE [orders] ADD FOREIGN KEY ([customer_id]) REFERENCES [customers] ([id])
GO

ALTER TABLE [products] ADD FOREIGN KEY ([category_id]) REFERENCES [categories] ([id])
GO

ALTER TABLE [order_items] ADD FOREIGN KEY ([order_id]) REFERENCES [orders] ([id])
GO

ALTER TABLE [order_items] ADD FOREIGN KEY ([product_id]) REFERENCES [products] ([id])
GO

ALTER TABLE [product_image] ADD FOREIGN KEY ([product_id]) REFERENCES [products] ([id])
GO

ALTER TABLE [product_tag] ADD FOREIGN KEY ([product_id]) REFERENCES [products] ([id])
GO

ALTER TABLE [product_tag] ADD FOREIGN KEY ([tag_id]) REFERENCES [tags] ([id])
GO

ALTER TABLE [products] ADD FOREIGN KEY ([user_id]) REFERENCES [users] ([id])
GO
